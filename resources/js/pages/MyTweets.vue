<script>
import axios from "axios";
import Tweet from "./components/Tweet.vue";
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";

export default {
    components: {
        Tweet,
        Header,
        Footer
    },
    data() {
        return {
            tweets: []
        };
    },
    mounted() {
        this.getMyTweets();
    },
    methods: {
        async getMyTweets() {
            try {
                const userId = 1; // Using default user ID 1
                const response = await axios.get(`/api/${userId}/tweets`);
                this.tweets = response.data;
            } catch (error) {
                console.log(error);
            }
        }
    }
};
</script>
<template>
    <Header />
    <div>
        <h1>My Tweets</h1>
        <router-link to="/">All Tweets</router-link>
        <div v-if="tweets">
            <div class="container" v-if="tweets.length">
                <Tweet v-for="tweet in tweets" :key="tweet.id" :tweet="tweet" :showBtn="true" />
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
    gap: 20px;
}

.btnBox {
    display: flex;
    justify-content: center;
    margin: 30px;
}

</style>