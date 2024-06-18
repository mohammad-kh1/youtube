<script setup>
import { computed } from "vue";
import { Head, Link } from "@inertiajs/vue3";
import MagnifyIcon from "vue-material-design-icons/Magnify.vue";

const props = defineProps({ status: Number });

const title = computed(() => {
  return {
    503: "503: Service Unavailable",
    500: "500: Server Error",
    404: "404: Page Not Found",
    403: "403: Forbidden",
  }[props.status];
});

const description = computed(() => {
  return {
    503: "Sorry, we are doing some maintenance. Please check back soon.",
    500: "Whoops, something went wrong on our servers.",
    404: "This page isn't available. Sorry about that.Try searching for something else.",
    403: "Sorry, you are forbidden from accessing this page.",
  }[props.status];
});
</script>

<template>
  <Head :title="status" />
  <div class="flex items-center h-screen justify-center">
    <div class="flex-col">
      <div>
        <img src="/images/yo.png" alt="" />
      </div>
      <div class="w-[60%] text-center overflow-auto">{{ description }}</div>
      <div class="flex mt-3 items-center justify-center">
        <img
          src="/images/youtubelogo.png"
          width="128"
          class="mix-blend-mode-remove-bg mx-5"
          alt=""
        />
        <div class="w-[300-px]">
          <div class="rounded-full flex bg-[#222222]">
            <input
              type="text"
              class="form-control block w-full px-5 py-1.5 text-base font-normal  bg-clip-padding border border-solid  rounded-l-full transition ease-in-out m-0 focus:ring-0"
              placeholder="Search"
            />
            <MagnifyIcon class="mx-6 p-2" fillColor="#FFFFFF" :size="23" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>