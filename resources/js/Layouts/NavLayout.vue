<script setup>
import { ref, onMounted } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import MenuIcon from "vue-material-design-icons/Menu.vue";
import MagnifyIcon from "vue-material-design-icons/Magnify.vue";
import SideNavItem from "@/Components/SideNavItem.vue";

const openSideNav = ref(true);
const openSideNavOverlay = ref(false);
const sideNavOverlay = ref(null);
const width = ref(document.documentElement.clientWidth);
const profile = ref(false);
const resize = () => {
  if (width.value < 1280 && openSideNav.value) {
    openSideNav.value = false;
  }
  if (width.value > 1279 && !openSideNav.value) {
    openSideNav.value = true;
  }
};

onMounted(() => {
  resize();
  sideNavOverlay.value.classList.value = sideNavOverlay.value.classList.value +=
    " hidden";
  window.addEventListener("resize", () => {
    width.value = document.documentElement.clientWidth;
    resize();
  });
});

const isNavOverlay = () => {
  if (usePage().url === "/") {
    openSideNav.value = !openSideNav.value;
  }
  if (usePage().url === "/add-video") {
    openSideNavOverlay.value = !openSideNavOverlay.value;
  }
  if (usePage().url === "/delete-video") {
    openSideNavOverlay.value = !openSideNavOverlay.value;
  }

  if (width.value < 640) {
    openSideNavOverlay.value = !openSideNavOverlay.value;
  }
  if (usePage().url !== "/" && width.value < 640) {
    openSideNavOverlay.value = !openSideNavOverlay.value;
  }
  if (usePage().props.video) {
    openSideNavOverlay.value = !openSideNavOverlay.value;
  }
};
</script>


<template>
  <div class="relative">
    <div
      id="TopNav"
      class="w-[100%] h-[60px] fixed bg-black z-20 flex items-center justify-between"
    >
      <div class="flex items-center">
        <button
          @click="isNavOverlay()"
          class="p-2 ml-3 rounded-full hover:bg-gray-800 inline-block cursor-pointer"
        >
          <MenuIcon fillColor="#FFFFFF" :size="26" />
        </button>
        <div class="mx-2"></div>
        <Link
          :href="route('home')"
          class="flex text-white items-center justify-center mr-10 cursor-pointer"
        >
          <img src="/images/YT-logo.png" width="32" alt="" />
          <img src="/images/YT-logo-text.png" width="62" alt="" />
        </Link>
      </div>
      <div class="w-[600px] md:block hidden">
        <div class="rounded-full flex items-center bg-[#222222]">
          <input
            type="text"
            class="form-control block w-full px-5 py-1.5 text-base font-normal text-gray-200 bg-black placeholder-gray-400 bg-clip-padding border border-solid border-l-gray-700 border-y-gray-700 rounded-l-full transition ease-in-out m-0 border-transparent focus:ring-0"
            placeholder="Search"
          />
          <MagnifyIcon class="mx-6" fillColor="#FFFFFF" :size="23" />
        </div>
      </div>

      <div class="" v-if="$page.props.auth.user">
        <img
          @click="profile = !profile"
          class="rounded-full cursor-pointer"
          :class="[profile ? 'mx-20 mt-20' : 'mx-8']"
          width="35"
          src="https://randomuser.me/api/portraits/men/81.jpg"
        />
        <div
          class="text-white border-double p-2 w-[100%] mt-3 bg-[#717171] z-100 rounded-lg"
          v-if="profile"
        >
          <h1>Username</h1>

          <div class="border-b"></div>
          <Link v-if="$page.props.auth.user" href="/logout" method="post" as="button" type="button"
            >Logout</Link
          >
        </div>
      </div>
      <div v-else class="text-white mx-8">
        <Link :href="route('login')" as="button" type="button">Login</Link>
      </div>
    </div>
    <div
      v-if="$page.url === '/'"
      id="SideNav"
      class="h-[100%] fixed z-0 bg-black w-[240px]"
      :class="[!openSideNav ? 'w-[70px] ' : 'w-[240px]']"
    >
      <ul
        :class="[!openSideNav ? 'p-2' : 'px-5 pb-2 pt-[7px]']"
        class="mt-[60px] w-full"
      >
        <Link :href="route('home')">
          <SideNavItem :openSideNav="openSideNav" iconString="Home" />
        </Link>
        <Link :href="route('addVideo')">
          <SideNavItem v-if="$page.props.auth.user" :openSideNav="openSideNav" iconString="Add Video" />
        </Link>
        <Link :href="route('deleteVideo')">
          <SideNavItem v-if="$page.props.auth.user" :openSideNav="openSideNav" iconString="Delete Video" />
        </Link>
        <div class="border-b border-b-gray-700 my-2.5"></div>
        <SideNavItem v-if="$page.props.auth.user" :openSideNav="openSideNav" iconString="Subscription" />
        <SideNavItem v-if="$page.props.auth.user" :openSideNav="openSideNav" iconString="Library" />
        <SideNavItem v-if="$page.props.auth.user" :openSideNav="openSideNav" iconString="Liked" />
        <SideNavItem v-if="$page.props.auth.user" :openSideNav="openSideNav" iconString="History" />
        <SideNavItem v-if="$page.props.auth.user" :openSideNav="openSideNav" iconString="Watch Later" />
        <div v-if="openSideNav">
          <div class="border-b border-b-gray-700 my-2.5"></div>
          <div class="text-gray-400 text-[14px] text-extrabold">
            About Pree Copyright
            <div>Contact us</div>
          </div>
          <div class="border-b border-b-gray-700 my-2.5"></div>
          <div class="text-gray-400 text-[14px] text-extrabold">
            Terms Privacy Policy
          </div>
        </div>
      </ul>
    </div>

    <div v-if="width > 639">
      <div
        v-if="$page.url === '/'"
        id="SideNav"
        class="h-[100%] fixed z-0 bg-black"
        :class="[!openSideNav ? 'w-[70px] ' : 'w-[240px]']"
      >
        <ul
          :class="[!openSideNav ? 'p-2' : 'px-5 pb-2 pt-[7px]']"
          class="mt-[60px] w-full"
        >
          <Link :href="route('home')">
            <SideNavItem :openSideNav="openSideNav" iconString="Home" />
          </Link>
          <Link :href="route('addVideo')">
            <SideNavItem v-if="$page.props.auth.user" :openSideNav="openSideNav" iconString="Add Video" />
          </Link>
          <Link :href="route('deleteVideo')">
            <SideNavItem v-if="$page.props.auth.user" :openSideNav="openSideNav" iconString="Delete Video" />
          </Link>
          <div class="border-b border-b-gray-700 my-2.5"></div>
          <SideNavItem v-if="$page.props.auth.user" :openSideNav="openSideNav" iconString="Subscription" />
          <SideNavItem v-if="$page.props.auth.user" :openSideNav="openSideNav" iconString="Liked" />
          <SideNavItem v-if="$page.props.auth.user" :openSideNav="openSideNav" iconString="History" />
          <SideNavItem v-if="$page.props.auth.user" :openSideNav="openSideNav" iconString="Watch Later" />
          <div v-if="openSideNav">
            <div class="border-b border-b-gray-700 my-2.5"></div>
            <div class="text-gray-400 text-[14px] text-extrabold">
              About Pree Copyright
              <div>Contact us</div>
            </div>
            <div class="border-b border-b-gray-700 my-2.5"></div>
            <div class="text-gray-400 text-[14px] text-extrabold">
              Terms Privacy Policy
            </div>
          </div>
        </ul>
      </div>
    </div>

    <div
      @click="openSideNavOverlay = false"
      class="bg-black bg-opacity-70 fixed z-50 w-full h-screen"
      :class="
        openSideNavOverlay
          ? 'animate__animated animate__fadeIn animate__faster'
          : 'hidden z-[-1]'
      "
    ></div>

    <div>
      <div
        id="SideNavOverlay"
        ref="sideNavOverlay"
        class="h-[100%] fixed z-50 bg-black mt-[9px] w-[240px]"
        :class="[
          openSideNavOverlay
            ? 'animate__animated animate__slideInLeft animate__faster'
            : 'animate__animated animate__slideOutLeft animate__faster',
        ]"
      >
        <div class="flex items-center">
          <button
            @click="isNavOverlay()"
            class="p-2 ml-3 rounded-full hover:bg-gray-800 cursor-pointer"
          >
            <MenuIcon fillColor="#FFFFFF" :size="26" />
          </button>
          <div class="mx-2"></div>
          <Link
            :href="route('home')"
            class="flex text-white items-center justify-center mr-10 cursor-pointer"
          >
            <img src="/images/YT-logo.png" width="32" alt="" />
            <img src="/images/YT-logo-text.png" width="62" alt="" />
          </Link>
        </div>
        <ul class="w-full px-5 py-2 p-2 mt-2">
          <Link :href="route('home')">
            <SideNavItem :openSideNav="openSideNav" iconString="Home" />
          </Link>
          <Link :href="route('addVideo')">
            <SideNavItem v-if="$page.props.auth.user"  :openSideNav="true" iconString="Add Video" />
          </Link>
          <Link :href="route('deleteVideo')">
            <SideNavItem  v-if="$page.props.auth.user" :openSideNav="openSideNav" iconString="Delete Video" />
          </Link>

          <div class="border-b border-b-gray-700 my-2.5"></div>
          <SideNavItem v-if="$page.props.auth.user"  :openSideNav="true" iconString="Subscription" />
          <SideNavItem v-if="$page.props.auth.user"  :openSideNav="true" iconString="Liked" />
          <SideNavItem v-if="$page.props.auth.user"  :openSideNav="true" iconString="History" />
          <SideNavItem v-if="$page.props.auth.user"  :openSideNav="true" iconString="Watch Later" />
          <div v-if="openSideNav">
            <div class="border-b border-b-gray-700 my-2.5"></div>
            <div class="text-gray-400 text-[14px] text-extrabold">
              About Pree Copyright
              <div>Contact us</div>
            </div>
            <div class="border-b border-b-gray-700 my-2.5"></div>
            <div class="text-gray-400 text-[14px] text-extrabold">
              Terms Privacy Policy
            </div>
          </div>
        </ul>
      </div>
    </div>
    <div
      class="w-[100%] h-[calc(100vh-60px)] absolute right-0 top-[60px]"
      :class="{
        'w-[calc(100%-70px)]': !openSideNav,
        'w-[calc(100%-240px)]': openSideNav,
        'w-[100vw] xl:w-[calc(100%-80px)]': $page.url !== '/',
        'w-[100vw]': width < 639,
      }"
    >
      <slot />
    </div>
  </div>
</template>

<style>
body {
  background-color: black;
}
</style>