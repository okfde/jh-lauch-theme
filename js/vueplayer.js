document.addEventListener('DOMContentLoaded', function () {
  if (document.querySelector('#vuevideo')) {
    Vue.component('VideoPrev', {
      props: ['videoItem', 'active'],
      computed: {
        thumbnailSrc () {
          if (this.videoItem.img) {
            return this.videoItem.img;
          } else {
            return 'https://img.youtube.com/vi/' + this.videoItem.youtubeid + '/hqdefault.jpg';
          }
        },
        isActive () {
          return this.active === this.videoItem.youtubeid;
        }
      },
      template: `
          <li class="thumbnail"
              v-bind:class="{ active : isActive }">
            <input type="radio"
                   :id="videoItem.youtubeid"
                   class="a11y-visuallyhidden"
                   name="playqueue"
                   :value="videoItem.youtubeid"
                   @change="$emit('chooseVideo', videoItem.youtubeid)">
            <label :for="videoItem.youtubeid">
              <div class="thumbnail-img">
                <img :src="thumbnailSrc" alt="Video thumbnail" width="75" height="50">
                <p class="thumbnail-body">{{ videoItem.title }}</p>
              </div>
            </label>
          </li>`
    });

    Vue.component('VideoHeader', {
      props: ['isLarge', 'taxonomies'],
      computed: {
        taxonomyString () {
          return this.taxonomies.join(" | ");
        },
        sizeClass () {
          if (this.isLarge) {
            return 'large';
          } else {
            return 'smol';
          }
        }
      },
      template: `
        <div class="video-header" v-bind:class="sizeClass">
          <h2 class="video-title">Playlist</h2>
          <p class="c-uppercase-title">{{ taxonomyString  }}</p>
        </div>`
    });


    var vm = new Vue({
      el: document.querySelector('#vuevideo'),
      data: {
        baseUrl: '/wp-json/lauch/v1/retro_videos',
        videos: [],
        activeVideo: '',
        taxonomies: []
      },
      computed: {
        playerSrc () {
          return 'https://www.youtube-nocookie.com/embed/' + this.activeVideo + '?enablejsapi=1';
        },
        playerSrcdoc () {
          return `<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube-nocookie.com/embed/${this.activeVideo}?autoplay=1><img src=https://img.youtube.com/vi/${this.activeVideo}/hqdefault.jpg alt=''><span>▶</span></a>`;
        },
        colorClass () {
          let cl = 'c-videoplayer';
          if (window.v.color) {
            cl +=  ' c-videoplayer--' + window.v.color;
          }
          return cl;
        }
      },
      methods: {
        onVideoChoose (vidId) {
          this.activeVideo = vidId;
        },
        constructUrl () {
          let url = this.baseUrl + '?';
          if (window.v.location !== "") {
            url += 'location=' + window.v.location + '&';
            this.taxonomies.push(window.v.location);
          }
          if (window.v.type !== "") {
            url += 'type=' + window.v.type + '&';
          }
          if (window.v.tech !== "") {
            url += 'tech=' + window.v.tech + '&';
            this.taxonomies.push(window.v.tech);
          }
          if (window.v.topics !== "") {
            url += 'topics=' + window.v.topics + '&';
            this.taxonomies.push(window.v.topics);
          }
          if (window.v.year !== "") {
            url += 'year=' + window.v.year + '&';
            this.taxonomies.push(window.v.year);
          }
          return url;
        }
      },
      template: `
      <div :class="this.colorClass">
      <div class="video-player">
        <VideoHeader :taxonomies=taxonomies
                     :isLarge=false></VideoHeader>

        <div class="video-container" v-if="activeVideo">
          <iframe width="640"
                  height="360"
                  :src="this.playerSrc"
                  frameborder="0"
                  title="Videoplaylist - Aktives Video"
                  loading="lazy"
                  allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>

      <div class="video-playlist">
        <VideoHeader :taxonomies=this.taxonomies
                     :isLarge=true></VideoHeader>
        <ul>
          <VideoPrev v-on:chooseVideo="onVideoChoose"
               v-for="video in videos"
               :key="video.id"
               :video-item="video"
               :active="activeVideo"></VideoPrev>
        </ul>
       </div>
      </div>
      </div>`,
      mounted: function(){
        const url = this.constructUrl();
        fetch(url).then((response)=>{
          return response.json();
        }).then((data)=>{
          this.videos = data;
          this.activeVideo = data[0].youtubeid;
        });
      }
    });
  }
});
