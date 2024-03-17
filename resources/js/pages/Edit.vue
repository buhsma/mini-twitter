

<script>
import axios from "axios";
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";

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
    <Header/>
    <div>
        <h1>Edit Tweet</h1>
        <div v-if="tweet">
            <div>
                <label>Title:</label>
                <span>{{ tweet.title }}</span>
            </div>
            <div>
                <label>Text:</label>
                <span>{{ tweet.text }}</span>
            </div>
            <router-link :to="{ name: 'UpdateTweet', params: { tweetId: tweetId } }">Update</router-link>
            <router-link :to="{ name: 'DeleteConfirmation', params: { tweetId: tweetId } }">Delete</router-link>
        </div>
    </div>
    <Footer/>
</template>
