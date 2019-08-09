console.log('revolving claims');

var rc = new Vue({
  el: document.querySelector('#revolving-claims'),
  data: {
    baseUrl: 'wp-json/lauch/v1/revolving_claims',
    claims: [],
    waiter: 0,
    distance: 100
  },
  methods: {
    onCaroussel () {
      this.waiter = this.waiter + 1;
      this.distance = this.distance + 100;

      if (this.waiter > this.claims.length) {
        this.waiter = 0;
        this.distance = this.claims.length * 100 * (-1) + 100;
      }
    }
  },
  computed: {
    caroussel () {
      return this.distance;
    }
  },
  template: `
  <span class="container" style="position: relative; width: 100px; overflow: hidden; display: inline-block; height: 2em; border: 1px solid gold; ">
    <span class="slider"
          style="position: absolute; width: 100vw"
          v-bind:style="{ marginLeft: caroussel + 'px' }">
      <span class="slide"
            style="display: inline-block; width: 100px"
            v-for="claim in claims">{{ claim }}</span>
    </span>
  </span>
  `,
  mounted: function () {
    fetch(this.baseUrl).then((response) => {
      return response.json();
    }).then((data) => {
      this.claims = data.reverse();
      this.distance = this.claims.length * 100 * (-1) + 100;
      setInterval(this.onCaroussel, 3000);
    })
  }
})
