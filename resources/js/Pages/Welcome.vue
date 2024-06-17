<script setup>
import { Head, Link } from "@inertiajs/vue3";
import NavLayout from "@/Layouts/NavLayout.vue";
import VideoCard from "@/Components/VideoCard.vue";

// defineProps({
//   canLogin: {
//     type: Boolean,
//   },
// });

</script>

<template>
  <Head title="Youtube" />
  <NavLayout> 
    <div class="grid 2xl:grid-cols-5 xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2">
      <VideoCard 
        title="SEA"
        user="Jhon"
        views="100k - 3 days ago"
        image="https://picsum.photos/200/300"
        videoUrl="/videos/vi.mp4"
        thumbnail="/videos/thumbnail/vi.png"
      ></VideoCard>
    </div>
  </NavLayout>
</template>
