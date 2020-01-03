<template>
    <div>
        <div class="d-flex">
            <div class="w-100">{{ title }}</div>
            <div class=" flex-shrink">
                <span id="like" class="like"
                    ><i
                        class="fa fa-thumbs-up"
                        :class="{ 'thumbs-up-active': liked }"
                        id="like_icon"
                        aria-hidden="true"
                        @click="vote('up')"
                    ></i
                ></span>
            </div>
            <div class="flex-shrink ml-3">
                <span
                    class="dislike 
             "
                    id="dislike"
                    ><i
                        class="fa fa-thumbs-down"
                        :class="{ 'thumbs-up-active': disliked }"
                        id="dislike_icon"
                        aria-hidden="true"
                    ></i
                ></span>
            </div>
            <div class="flex-shrink ml-3">
                <span class="like"
                    ><i class="fa fa-share" aria-hidden="true"></i
                ></span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["title", "liked", "disliked", "asset"],
    methods: {
        vote(type) {
            if (type === "up" && this.liked) return;

            if (type === "down" && this.disliked) return;

            axios
                .post(`/vote/${this.asset.id}/${this.asset.type}/${type}`)
                .then(({ data }) => {
                    alert(data);
                });
        }
    }
};
</script>

<style scoped>
.like,
.dislike {
    color: grey;
    font-size: 120%;
    cursor: pointer;
}

.thumbs-up-active {
    color: green;
}

.red {
    color: red;
}
</style>
