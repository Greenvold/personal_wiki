<template>
  <div class="row asset-deck">
    <div class="col-md-12 mt-4" v-if="loaded">
      <h4 class="content-heading" v-if="loaded">{{ this.title }}</h4>
      <hr class="shadow" v-if="loaded" />
      <div class="row animated fadeIn">
        <asset v-for="asset in assets.data" :key="asset.id" :asset="asset" :perPage="perPage"></asset>
      </div>
      <div class="text-center" v-if="nextAvailable || previousAvailable">
        <button
          class="btn btn-outline-primary"
          :class="{ disabled: !previousAvailable }"
          :disabled="!previousAvailable"
          @click="fetchPreviousAssets"
          v-if="loaded"
        >Previous</button>
        <button
          style="min-width:98.33px"
          class="btn btn-outline-primary"
          :class="{ disabled: !nextAvailable }"
          :disabled="!nextAvailable"
          @click="fetchAssets"
          v-if="loaded"
        >Next</button>
      </div>
    </div>
    <div class="col-md-12 mt-4" v-else>
      <div class="d-flex justify-content-center h-100">
        <div class="spinner-border text-primary align-self-center" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
//Import card
import asset from "./asset_card.vue";
export default {
  props: {
    default_assets: {
      default: () => []
    },
    title: {
      required: true,
      type: String
    },
    url: {
      required: true
    }
  },
  data() {
    return {
      assets: this.default_assets,
      next_url: this.url,
      previous_url: null,
      loaded: false,
      perPage: 0
    };
  },
  components: {
    asset
  },
  mounted() {
    this.fetchAssets();
  },
  methods: {
    fetchAssets() {
      axios.get(this.next_url).then(({ data }) => {
        this.assets = {
          ...data,
          data: [...data.data]
        };
        this.next_url = data.links.next ? data.links.next : null;
        this.previous_url = data.links.prev ? data.links.prev : null;
        this.perPage = data.meta.per_page;
        this.loaded = true;
      });
    },
    fetchPreviousAssets() {
      axios.get(this.previous_url).then(({ data }) => {
        this.assets = {
          ...data,
          data: [...data.data]
        };
        this.next_url = data.links.next ? data.links.next : null;
        this.previous_url = data.links.prev ? data.links.prev : null;
      });
    }
  },
  computed: {
    previousAvailable() {
      if (this.previous_url) {
        return true;
      }
      return false;
    },
    nextAvailable() {
      if (this.next_url) {
        return true;
      }
      return false;
    }
  }
};
</script>
<style scoped>
.asset-deck {
  min-height: 500px;
}
</style>
