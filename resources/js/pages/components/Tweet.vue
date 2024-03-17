<script>
import { formatDate } from "/home/petra/projects/laravel-vue-main/resources/js/tools/tools.js";
export default {
  props: {
    tweet: {
      type: Object,
      required: true
    }
  },
  methods: {
    formatDate,
  }
};
</script>

<template>
    <div>
      <span>{{ formatDate(tweet.created_at) }}</span>
        <h2>{{ tweet.title }}</h2>
        <p>{{ tweet.text }}</p>
    </div>
</template>

<style scoped>
    div {
        background-color: #ffffff;
        box-shadow: rgba(0, 0, 0, 0.09) 0px 3px 12px;
        display: flex;
        flex-direction: column;
        padding: 20px;
        border-radius: 10px;
        grid-column: 2;
    }

    span {
      text-align: right;
      color: #888888;
      font-size: 14px;
    }
    h2 {
      color: #222222;
      font-size: 18px;
    }
    p{
      color: #444444;
      font-size: 18px;
    }
</style>