<template>
  <li
    :class="[!openSideNav ? 'p-2' : 'flex items-center p-2']"
    class="text-white text-sm font-semibold text-center hover:bg-gray-700 rounded-lg cursor-pointer"
  >
    <div :class="[!openSideNav ? 'w-full flex justify-center' : '']">
      <component :is="icon" />
    </div>
    <div :class="[!openSideNav ? '' : 'mt-1 ml-4']">
      <span v-if="!openSideNav">{{ iconString.substring(0, 4) }}</span>
      <span v-else>{{ iconString }}</span>
    </div>
  </li>
</template>

<script setup>
import { ref, toRefs } from "vue";

import Home from "vue-material-design-icons/Home.vue";
import FolderPlayOutline from "vue-material-design-icons/FolderPlayOutline.vue";
import ImageUpOutline from "vue-material-design-icons/ImagePlusOutline.vue";
import ThumbUpOutline from "vue-material-design-icons/ThumbUpOutline.vue";
import History from "vue-material-design-icons/History.vue";
import ClockOutline from "vue-material-design-icons/ClockOutline.vue";
import VideoPlusOutlineIcon from "vue-material-design-icons/VideoPlusOutline.vue";
import DeleteIcon from "vue-material-design-icons/Delete.vue";

const props = defineProps({
  openSideNav: Boolean,
  iconString: String,
});
let icon = null;
const { openSideNav, iconString } = toRefs(props);


if (iconString.value === "Home") icon = Home;
if (iconString.value === "Subscription") icon = FolderPlayOutline;
if (iconString.value === "Library") icon = ImageUpOutline;
if (iconString.value === "Liked") icon = ThumbUpOutline;
if (iconString.value === "History") icon = History;
if (iconString.value === "Watch Later") icon = ClockOutline;
if (iconString.value === "Add Video") icon = VideoPlusOutlineIcon;
if (iconString.value === "Delete Video") icon = DeleteIcon;
</script>

<style lang="scss" scoped>
</style>