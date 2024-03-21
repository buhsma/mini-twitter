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
    <Header />
    <div class="container">
        <div class="box">
            <h1>Edit Tweet</h1>
            <div class="inputBox" v-if="tweet">
                <div>
                    <label>Title:</label>
                    <input type="text" v-model="editedTweet.title" />
                </div>
                <div>
                    <label>Text:</label>
                    <textarea rows="4" v-model="editedTweet.text"></textarea>
                </div>
                <button @click="updateTweet">Update Tweet</button>
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
}

.inputBox {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 7px;
}

.inputBox div {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

h1 {
    font-size: 32px;
    color: #222222;
    margin-top: 150px;
    margin-bottom: 50px;
}

label {
    font-size: 24px;
    color: #444444;
}

input {
    border-radius: 4px;
    font-size: 24px;
    margin-bottom: 30px;
    padding: 10px;
    border: 1px solid #999999;
    color: #000000;
}

textarea {
    resize: none;
    font-size: 24px;
    margin-bottom: 30px;
    padding: 10px;
    border: 1px solid #999999;
    border-radius: 4px;
    color: #000000;
}

button {
    border-radius: 10px;
    width: 110px;
    margin: 5px;
    padding: 7px;
    background-color: #1D9BF0;
    color: #ffffff;
    border: 1px solid #999999;
}
</style>