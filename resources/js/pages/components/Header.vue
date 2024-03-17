<template>
    <header>
        <router-link class="homeLink" to="/">
        <h1>Mini-Twitter</h1>
        </router-link>
        <div class="rightBox">
            <router-link class="myTweets" to="/MyTweets">My Tweets</router-link>
            <button>
                <router-link class="newTweet" to="/tweets/new">+ Create a Tweet</router-link>
            </button>
        </div>
    </header>
</template>

<style scoped>
header {
    position: fixed;
    background-color: #fff;
    top: 0;
    left: 0;
    width: 100%;
    display: grid;
    grid-template-columns: 2fr 3fr;

}

h1 {
    font-size: 24px;
    grid-column: 1;
    text-align: center;
    color: #222222;
}
.rightBox {
    grid-column: 2;
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    align-items: center;
}

.homeLink {
    text-decoration: none;
}
.myTweets {
    
}

button {
    background-color: #1D9BF0;
    border-radius: 30px;
    padding: 10px;
}

.newTweet {
    text-decoration: none;
    color: #fff;
}
</style>