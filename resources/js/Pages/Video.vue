<script setup>
import { Head, Link } from "@inertiajs/vue3";
import NavLayout from "@/Layouts/NavLayout.vue";
import ThumbUpOutline from "vue-material-design-icons/ThumbUpOutline.vue";
import ThumbDownOutline from "vue-material-design-icons/ThumbDownOutline.vue";
import CheckCircel from "vue-material-design-icons/CheckCircle.vue";
import RecommendedVideos from "@/Components/RecommendedVideos.vue";
// defineProps({
//   canLogin: {
//     type: Boolean,
//   },
// });
</script>

<template>
  <Head title="Youtube" />
  <NavLayout>
    <div class="xl:flex">
      <div class="p-3">
        <video src="/videos/vi.mp4" controls autoplay></video>
        <div class="text-white text-2xl font-extrabold mt-4">
          Title of Video
        </div>
        <div class="flex items-center mb-4">
          <div>
            <img
              class="rounded-full m-1.5 mt-2 flex items-baseline w-8 h-8"
              src="https://picsum.photos/200/300"
              alt=""
            />
          </div>
          <div class="pl-2 mt-1">
            <div class="text-white text-lg font-extrabold flex items-center">
              Name of user
              <CheckCircle fillColor="#888888" :size="17" />
            </div>
            <div class="text-sm text-gray-400 font-extrabold">
              20k views - 2 days ago
            </div>
          </div>
        </div>
        <div class="bg-[#3F3F3F] rounded-lg w-full p-3 text-white">
          <div class="text-white text-lg font-extrabold">
            20k views - 2 days ago
          </div>
          <div class="text-sm font-extrabold mb-6">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum
            placeat quia
          </div>
          <div class="text-sm font-extrabold mb-6">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum
            placeat quia
          </div>
        </div>
        <div class="mt-6">
          <div class="text-white text-lg font-extrabold">10 Comments</div>
          <div class="flex items-flex mb-4 mt-2">
            <img
              class="rounded-full mt-2 w-12 h-12"
              src="https://picsum.photos/200/300"
              alt=""
            />

            <div class="pl-6 mt-1">
              <div class="text-white font-extrabold flex items-baseline">
                <div>Jhon Adam</div>
                <div class="text-gray-400 pl-3">1 Days Ago</div>
              </div>
              <div class="text-gray-200 text-sm font-semibold">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Obcaecati rerum nostrum perspiciatis ullam cupiditate est quod,
                tenetur laborum qui nulla iusto tempora eos voluptatum tempore,
                velit culpa reiciendis voluptatibus deserunt?
              </div>
              <div class="mt-4 flex items-center">
                <ThumbUpOutline fillColor="#FFFFFF" :size="20" class="pr-2" />
                <div class="text-gray-400 text-sm font-extrabold pr-10">
                  {{ (Math.random() * 100).toFixed(0) }}
                </div>
                <ThumbDownOutline fillColor="#FFFFFF" :size="20" />
                <div class="text-gray-400 pl-3">10</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-[500px] p-3 sm:block ">
        <div class="flex mb-3">
          <RecommendedVideos
            :vid="{
              title: 'py 1',
              video: '/videos/vi.mp4',
              thumbnail: '/videos/thumbnail/vi.png',
              user: 'Mic',
              views: '20k views - 2 days asgo',
            }"
          />
        </div>
      </div>
    </div>
  </NavLayout>
</template>
