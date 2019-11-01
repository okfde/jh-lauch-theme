document.addEventListener('DOMContentLoaded', function () {
  if (document.querySelector('#vuevideo')) {
    Vue.component('VideoPrev', {
      props: ['videoItem', 'active'],
      computed: {
        thumbnailSrc () {
          return 'https://img.youtube.com/vi/' + this.videoItem.youtubeid + '/hqdefault.jpg';
        },
        isActive () {
          return this.active === this.videoItem.youtubeid;
        }
      },
      template: `
      <div class="thumbnail"
            v-bind:class="{ active : isActive }">
        <input type="radio"
               :id="videoItem.youtubeid"
               name="vid"
               :value="videoItem.youtubeid"
               @change="$emit('chooseVideo', videoItem.youtubeid)">
        <label :for="videoItem.youtubeid">
          <div class="thumbnail-img">
            <img :src="thumbnailSrc" alt="Video thumbnail">
            <h3>{{videoItem.title}}</h3>
          </div>
        </label>
        <div class="thumbnail-info">
          <ul class="tag-list">
            <li v-for="tag in videoItem.tags" :key="tag.term_id">#{{tag.slug}}</li>
          </ul>
        </div>
      </div>`
    });


    var vm = new Vue({
      el: document.querySelector('#vuevideo'),
      data: {
        baseUrl: '/wp-json/lauch/v1/retro_videos',
        videos: [],
        activeVideo: ''
      },
      computed: {
        playerSrc () {
          return 'https://www.youtube-nocookie.com/embed/' + this.activeVideo + '?enablejsapi=1';
        },
      },
      methods: {
        onVideoChoose (vidId) {
          this.activeVideo = vidId;
        },
        constructUrl () {
          let url = this.baseUrl + '?';
          if (window.v.location !== "") {
            url += 'location=' + window.v.location + '&';
          }
          if (window.v.year !== "") {
            url += 'year=' + window.v.year + '&';
          }
          if (window.v.type !== "") {
            url += 'type=' + window.v.type;
          }
          return url;
        }
      },
      template: `
      <div class="video-player">
        <div class="video-container" v-if="activeVideo">
          <iframe width="640" height="360" :src="this.playerSrc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          <h2>{{ activeVideo.title }}</h2>
        </div>
        <div class="video-list">
        <VideoPrev v-on:chooseVideo="onVideoChoose"
               v-for="video in videos"
               :key="video.id"
               :video-item="video"
               :active="activeVideo.youtubeid"></VideoPrev>
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
