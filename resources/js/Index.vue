<template>
    <div id="main" class="">
        <router-view></router-view>
        <nav id="navbar" class="absolute bottom-0 left-0 bg-teal-700 w-full p-4 mb-6 flex content-center">
            <h2 class="text-lg uppercase text-teal-100 mx-4">
                Peacock
            </h2 >
            <navigationMenu></navigationMenu>
        </nav>
    </div>
</template>

<script>
  import navigationMenu from './components/Menu.vue'
  export default {
    data() {
      return {
        //
      }
    },
    components: {
      navigationMenu
    }
  }
</script>