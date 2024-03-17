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
                title: "",
                text: "",
            },
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
                this.editedTweet.title = this.tweet.title;
                this.editedTweet.text = this.tweet.text;
            } catch (error) {
                console.log(error);
            }
        },
        async updateTweet() {
            try {
                await axios.put(`/api/tweets/${this.tweetId}`, this.editedTweet);
                this.$router.push({ name: "MyTweets" }); // Redirect to the user's tweets page after updating
            } catch (error) {
                console.log(error);
            }
        },
    },
};
</script>

<template>
    <Header/>
    <div>
        <h1>Edit Tweet</h1>
        <div v-if="tweet">
            <div>
                <label>Title:</label>
                <input type="text" v-model="editedTweet.title" />
            </div>
            <div>
                <label>Text:</label>
                <textarea v-model="editedTweet.text"></textarea>
            </div>
            <button @click="updateTweet">Update</button>
        </div>
    </div>
    <Footer/>
</template>