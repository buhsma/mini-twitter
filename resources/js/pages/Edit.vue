<script>
import axios from "axios";
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
import { formatDateTime } from "/home/petra/projects/laravel-vue-main/resources/js/tools/tools.js";

export default {
    components: {
        Header,
        Footer
    },
    data() {
        return {
            tweetId: null,
            tweet: null,
            editedTweet: {
                title: '',
                text: ''
            }
        };
    },
    mounted() {
        // Fetch the tweet to edit based on the route parameter (tweetId)
        this.tweetId = this.$route.params.tweetId;
        this.fetchTweet();
    },
    methods: {
        formatDateTime,
        async fetchTweet() {
            try {
                const response = await axios.get(`/api/tweets/${this.tweetId}`);
                this.tweet = response.data;

            } catch (error) {
                console.log(error);
            }
        },

    }
};
</script>

<template>
    <Header />
    <div>
        <h1>Edit Tweet</h1>
        <div class="container" v-if="tweet">
            <div class="box">
                <span>Tweeted: {{ formatDateTime(tweet.created_at) }}</span>
                <h2>{{ tweet.title }}</h2>
                <p>{{ tweet.text }}</p>
                <div class="btnBox">
                    <router-link :to="{ name: 'UpdateTweet', params: { tweetId: tweetId } }">
                        <button class="editBtn">Edit Tweet</button>
                    </router-link>
                    <router-link :to="{ name: 'DeleteConfirmation', params: { tweetId: tweetId } }">
                        <button class="deleteBtn">Delete Tweet</button>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
    <Footer />
</template>

<style scoped>
.container {
    display: grid;
    grid-template-columns: 1fr minmax(300px, 2fr) 1fr;
    align-items: center;

}

.box {
    grid-column: 2;
    margin-top: 30%;
    width: 100%;
    display: flex;
    flex-direction: column;
}

span {
    text-align: right;
    color: #888888;
    font-size: 16px;
}

h2 {
    color: #222222;
    font-size: 32px;
}

p {
    color: #444444;
    font-size: 24px;
}

.btnBox {
    display: flex;
    flex-direction: row;
    
}
button {
    border-radius: 7px;
    width: 100px;
    margin: 5px;
    padding: 7px;
    border-style: solid;
}

.editBtn{
    background-color: #222222;
    color: #ffffff;
}

.deleteBtn {
    background-color: #DF1313;
    color: #ffffff;
}
</style>