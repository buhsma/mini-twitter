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
    <Header />
    <div class="container">
        <div class="box">
            <h1>Create Tweet</h1>
            <h2>What would you like to share?</h2>
            <div class="inputBox">
                <div>
                    <label>Title:</label>
                    <input type="text" v-model="newTweet.title" />
                </div>
                <div>
                    <label>Text:</label>
                    <textarea rows="4" v-model="newTweet.text"></textarea>
                </div>
                <button @click="createTweet">Create Tweet</button>
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
}

h2 {
    font-size: 24px;
    color: #666666;
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
}
textarea {
    resize: none;
    font-size: 24px;
    margin-bottom: 30px;
    padding: 10px;
    border: 1px solid #999999;
    border-radius: 4px;
}

button {
    border-radius: 10px;
    width: 100px;
    margin: 5px;
    padding: 7px;
    background-color: #1D9BF0;
    color: #ffffff;
    border: 1px solid #999999;
}
</style>