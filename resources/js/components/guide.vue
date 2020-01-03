<template>
    <div class="card">
        <div class="card-header">
            <votes
                :title="guide.title"
                :liked="upVoted"
                :disliked="downVoted"
                :asset="guide"
            ></votes>
        </div>
        <div class="card-body">{{ guide.content }}</div>
        <div class="card-footer">
            {{ guide.published_at }} by {{ guide.author.name }}
        </div>
    </div>
</template>

<script>
import Votes from "./votes.vue";
export default {
    props: {
        guide: {
            required: true,
            default: () => []
        },
        default_likes: {
            required: true,
            default: () => []
        },
        default_dislikes: {
            required: true,
            default: () => []
        }
    },
    data() {
        return {
            likes: this.default_likes,
            dislikes: this.default_dislikes
        };
    },
    components: {
        Votes
    },
    computed: {
        upVoted() {
            if (!__auth()) return false;

            return !!this.likes.find(l => l.user_id === __auth().id);
        },
        downVoted() {
            if (!__auth()) return false;

            return !!this.dislikes.find(l => l.user_id === __auth().id);
        }
    }
};
</script>

<style scoped></style>
