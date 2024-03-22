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
        };
    },
    mounted() {
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
        async deleteTweet() {
            try {
                await axios.delete(`/api/tweets/${this.tweetId}`);
                this.$router.push({ name: "MyTweets" }); // Redirect to the user's tweets page after deletion
            } catch (error) {
                console.log(error);
            }
        },
        confirmDelete() {
            this.deleteTweet(); // Call deleteTweet method to perform deletion
        },
        cancelDelete() {
            this.$router.push({ name: "EditTweet", params: { tweetId: this.tweetId } });
        },
    },
};
</script>

<template>
    <Header />
    <div>
        <h1>Delete Tweet</h1>
        <div v-if="tweet">
            <p>Are you sure you want to delete this tweet?</p>
            <button @click="confirmDelete">Yes, Delete</button>
            <button @click="cancelDelete">Cancel</button>
        </div>
    </div>
    <Footer />
</template>