<script setup>
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import NavLayout from "@/Layouts/NavLayout.vue";
import { reactive } from "vue";

const form = useForm({
  title: null,
  thumbnail: null,
  video: null,
});

const submit = () => {
  router.post("/uploadVideo", form, {
    errorBag: {
      title: "Title is required.",
      thumbnail: "Thumbnail is required.",
      video: "Video is required.",
    },
    onSuccess: () => {
      alert("Video uploaded successfully.");
      form.reset();
    },
  });
};
</script>

<template>
  <Head title="Youtube" />
  <NavLayout>
    <div class="max-w-xl mx-auto px-4">
      <div class="text-white font-extrabold text-3xl py-10">Add Video</div>
      <form @submit.prevent="submit" enctype="multipart/form-data">
        <div>
          <div class="text-gray-200">Title</div>
          <input
            v-model="form.title"
            id="title"
            type="text"
            class="form-control block w-full px-5 py-1.5 text-xl border border-solid border-white font-normal text-gray-200 bg-black placeholder-gray-400 bg-clip-padding ease-in-out m-0 border-transparent focus:ring-0"
            placeholder="My Video"
          />
          <span class="text-red-500">{{ $page.props.errors.title }}</span>
        </div>
        <div class="my-5"></div>
        <div>
          <div class="text-gray-200">Thumbnail</div>
          <input
            @input="form.thumbnail = $event.target.files[0]"
            type="file"
            class="form-control block w-full px-3 py-1.5 border text-white border-solid border-gray-600 rounded transition ease-in-out m-0 focus:text-gray-700 focus:border-blue-600 focus:outline-none"
            accept="image/*"
          />
          <span class="text-red-500">{{ $page.props.errors.thumbnail }}</span>
        </div>
        <div class="my-5"></div>
        <div>
          <div class="text-gray-200">Video File</div>
          <input
            type="file"
            @input="form.video = $event.target.files[0]"
            class="form-control block w-full px-3 py-1.5 border text-white border-solid border-gray-600 rounded transition ease-in-out m-0 focus:text-gray-700 focus:border-blue-600 focus:outline-none"
            accept="video/*"
          />
          <span class="text-red-500">{{ $page.props.errors.video }}</span>
        </div>
        <div class="my-5"></div>
        <div class="float-right">
          <button
            class="text-white bg-green-600 hover:bg-green-700 font-bold py-2 px-4 rounded cursor-pointer"
            type="submit"
          >
            Upload Video
          </button>
        </div>
      </form>
    </div>
  </NavLayout>
</template>
