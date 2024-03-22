import { createRouter, createWebHistory } from "vue-router";
import Home from "./pages/Home.vue";
import MyTweets from "./pages/MyTweets.vue";
import EditTweet from "./pages/Edit.vue";
import UpdateTweet from "./pages/UpdateTweet.vue";
import DeleteConfirmation from "./pages/DeleteConfirmation.vue";
import NewTweet from "./pages/NewTweet.vue";

const routes = [
    {
        path: "/",
        component: Home,
    },
    {
        path: "/MyTweets",
        name: "MyTweets",
        component: MyTweets,
    },
    {
        path: "/edit/:tweetId",
        name: "EditTweet",
        component: EditTweet,
        props: true,
    },
    {
        path: "/update/:tweetId",
        name: "UpdateTweet",
        component: UpdateTweet,
    },
    {
        path: "/delete/:tweetId",
        name: "DeleteConfirmation",
        component: DeleteConfirmation,
    },
    {
        path: "/tweets/new",
        name: "NewTweet",
        component: NewTweet,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
