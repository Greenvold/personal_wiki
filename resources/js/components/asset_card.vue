<template>
  <div :class="{'col-lg-3 mb-3 col-md-3' :perPage=='4','col-lg-4 mb-3 col-md-4' : perPage==3}">
    <a :href="urlLink" class="card asset shadow scale">
      <div class="ribbon-free">
        <span>FREE</span>
      </div>

      <div class="ribbon-paid">
        <span>PAID</span>
      </div>
      <img :src="'/storage/' + asset.image" class="card-img-top" :alt="asset.title" />
      <div class="card-body card-body-sm custombody">
        <h5 class="card-title-lg">{{ asset.title }}</h5>
        <div style="min-height:40px">
          <a
            class="badge badge-info badge-pill mr-2"
            v-for="tag in asset.tags.slice(0, 5)"
          >{{ tag.title }}</a>
        </div>
        <p class="card-text">
          Some quick example text to build on the card title and make
          up the bulk of the card's content.
        </p>
      </div>
    </a>
  </div>
</template>

<script>
export default {
  props: {
    asset: {
      required: true,

      default: () => {}
    },
    perPage: {
      required: true
    }
  },
  computed: {
    urlLink() {
      return `/asset/${this.asset.slug}/show`;
    }
  }
};
</script>

<style scoped>
.custombody {
  min-height: 185px !important;
}
</style>
