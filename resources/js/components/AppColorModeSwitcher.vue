<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Icon } from '@iconify/vue';
import { useColorMode } from '@vueuse/core';

const DARK_COLOR_MODE_COOKIE_NAME = 'dark.color.mode';
const DARK_COLOR_MODE_COOKIE_MAX_AGE = 60 * 60 * 24 * 7;

const mode = useColorMode({ disableTransition: false });

const toggleMode = () => {
    mode.value = mode.value === 'dark' ? 'light' : 'dark';

    const darkMode = mode.value === 'dark';

    document.cookie = `${DARK_COLOR_MODE_COOKIE_NAME}=${darkMode}; path=/; max-age=${DARK_COLOR_MODE_COOKIE_MAX_AGE}`
};
</script>

<template>
    <Button variant="outline" size="icon" @click="toggleMode">
        <Icon icon="radix-icons:moon" class="h-[1.2rem] w-[1.2rem] scale-100 rotate-0 transition-all dark:scale-0 dark:-rotate-90" />
        <Icon icon="radix-icons:sun" class="absolute h-[1.2rem] w-[1.2rem] scale-0 rotate-90 transition-all dark:scale-100 dark:rotate-0" />
    </Button>
</template>

<style scoped></style>
