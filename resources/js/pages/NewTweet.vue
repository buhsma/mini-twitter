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
            newTweet: {
                title: "",
                text: "",
            },
        };
    },
    methods: {
        async createTweet() {
            try {
                await axios.post("/api/tweets", this.newTweet);
                this.$router.push({ name: "MyTweets" }); // Redirect to the user's tweets page after creating a new tweet
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
        <h1>New Tweet</h1>
        <div>
            <div>
                <label>Title:</label>
                <input type="text" v-model="newTweet.title" />
            </div>
            <div>
                <label>Text:</label>
                <textarea v-model="newTweet.text"></textarea>
            </div>
            <button @click="createTweet">Create</button>
        </div>
    </div>
    <Footer/>
</template>