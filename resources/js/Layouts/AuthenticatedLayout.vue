<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";
import DashboardSideNav from "@/Components/DashboardSideNav.vue";
import DashboardNavBar from "@/Components/DashboardNavBar.vue";
import DashboardConfig from "@/Components/DashboardConfig.vue";
import ArgonSwitchButton from "@/Components/ArgonSwitchButton.vue";

// const showingNavigationDropdown = ref(false);


const isDashboardConfigActive = ref(false)
const handleToggleDashboardConfig = () => {
    isDashboardConfigActive.value = !isDashboardConfigActive.value
}

// dark mode
import { useDark, useToggle } from '@vueuse/core'
import DashboardFooter from "@/Components/DashboardFooter.vue";

const isDark = useDark()
const toggleDark = useToggle(isDark)

</script>
<template>
    <!-- Wrapper utama harus flex-column & min-h-screen -->
    <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
  
      <!-- Background biru atas -->
      <div class="absolute w-full bg-blue-500 dark:hidden min-h-75 z-0"></div>
  
      <!-- Sidebar -->
      <DashboardSideNav />
  
      <!-- Konten Utama -->
      <main
        class="flex-grow relative transition-all duration-200 ease-in-out xl:ml-68 rounded-xl z-10"
      >
        <DashboardNavBar />
        <slot />
      </main>
  
      <!-- Footer -->
      <DashboardFooter />
  
      <!-- Panel Konfigurasi -->
      <DashboardConfig
        :isDashboardConfigActive
        @dashboardConfigTrigger="handleToggleDashboardConfig"
      >
        <template #darkmode>
          <ArgonSwitchButton name="darkmode" v-model:checked="isDark" />
        </template>
      </DashboardConfig>
    </div>
  </template>
  
