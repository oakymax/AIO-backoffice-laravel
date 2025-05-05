<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '@/components/PlaceholderPattern.vue';

import {
    Payment,
    columns
} from '@/components/payments/columns';
import { onMounted, ref } from 'vue'
import DataTable from '../components/payments/data-table.vue'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

const data = ref<Payment[]>([]);

async function getData(): Promise<Payment[]> {
    // Fetch data from your API here.
    return [
        {
            id: '728ed52f',
            amount: 100,
            status: 'pending',
            email: 'a@example.com',
        },
        {
            id: '728ed52f',
            amount: 101,
            status: 'processing',
            email: 'b@example.com',
        },
        {
            id: '728ed52f',
            amount: 102,
            status: 'pending',
            email: 'c@example.com',
        },
        {
            id: '728ed52f',
            amount: 103,
            status: 'processing',
            email: 'd@example.com',
        },
        {
            id: '728ed52f',
            amount: 104,
            status: 'pending',
            email: 'e@example.com',
        },
        {
            id: '728ed52f',
            amount: 105,
            status: 'failed',
            email: 'f@example.com',
        },
        {
            id: '728ed52f',
            amount: 106,
            status: 'failed',
            email: 'g@example.com',
        },
        {
            id: '728ed52f',
            amount: 107,
            status: 'pending',
            email: 'h@example.com',
        },
        {
            id: '728ed52f',
            amount: 108,
            status: 'processing',
            email: 'i@example.com',
        },
        {
            id: '728ed52f',
            amount: 109,
            status: 'success',
            email: 'k@example.com',
        },
        {
            id: '728ed52f',
            amount: 110,
            status: 'success',
            email: 'l@example.com',
        },
        {
            id: '728ed52f',
            amount: 111,
            status: 'failed',
            email: 'm@example.com',
        },
        {
            id: '728ed52f',
            amount: 112,
            status: 'processing',
            email: 'n@example.com',
        },
        {
            id: '728ed52f',
            amount: 113,
            status: 'success',
            email: 'o@example.com',
        },
    ]
}

onMounted(async () => {
    data.value = await getData()
})

</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <div class="container py-10 mx-auto">
                    <DataTable :columns="columns" :data="data" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
