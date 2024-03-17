<script>
import axios from "axios";
import Tweet from "./components/Tweet.vue";
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
import { sortByNewest, sortByOldest } from "/home/petra/projects/laravel-vue-main/resources/js/tools/tools.js";

export default {
    components: {
        Tweet,
        Header,
        Footer
    },
    data() {
        return {
            tweets: [],
            originalTweets: [],
            searchQuery: ''
        };
    },
    mounted() {
        this.getAllTweets();
    },
    methods: {
        async getAllTweets() {
            try {
                const response = await axios.get("/api/tweets");
                this.tweets = response.data;
                // Initialize originalTweets with the same data as tweets
                this.originalTweets = [...this.tweets];
            } catch (error) {
                console.log(error);
            }
        },
        sortByNewest() {
            this.tweets = sortByNewest(this.originalTweets);
        },
        sortByOldest() {
            this.tweets = sortByOldest(this.originalTweets);
        },
        filterTweets() {
            if (!this.searchQuery) {
                // Reset the tweets to show all when the search query is empty
                this.tweets = this.originalTweets;
            } else {
                const query = this.searchQuery.toLowerCase();
                this.tweets = this.originalTweets.filter(tweet => {
                    return tweet.title.toLowerCase().includes(query) || tweet.text.toLowerCase().includes(query);
                });
            }
        }
    }
};
</script>

<template>
    <Header />
    <div>
        <h1>All Tweets</h1>
        <div class="btnBox">
            <button @click="sortByNewest()">Sort by newest</button>
            <button @click="sortByOldest()">Sort by oldest</button>
            <div class="searchBox">
                <input type="text" v-model="searchQuery">
                <button @click="filterTweets">Search</button>
            </div>
        </div>
        <div class="container" v-if="tweets.length">
            <Tweet v-for="tweet in tweets" :key="tweet.id" :tweet="tweet" />
        </div>
        <!-- If tweets is empty, display "No results found" message -->
        <div v-else>
            No results found.
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