<script setup lang="ts">
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import { BreadcrumbItemType, SharedData } from '@/types';
import { useColorMode } from '@vueuse/core';
import { usePage } from '@inertiajs/vue3';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const darkColorMode = usePage<SharedData>().props.darkColorMode;

const mode = useColorMode();
mode.value = darkColorMode ? 'dark' : 'light';
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <slot />
    </AppLayout>
</template>
