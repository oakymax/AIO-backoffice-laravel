<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'ОРД',
        href: '/ord',
    },
    {
        title: 'Контрагенты',
        href: '/ord/contractors',
    },
];

import { Payment, columns } from '@/components/payments/columns';
import { onMounted, ref } from 'vue';

import ContractorsTable from '@/components/ord/contractors/ContractorsTable.vue';

const props = defineProps({
    contractors: Array<Payment>
})

const data = ref<Payment[]>([]);


console.log(props.contractors)

async function getData(): Promise<Payment[]> {
    return props.contractors || [];
}

onMounted(async () => {
    data.value = await getData();
});
</script>

<template>
    <Head title="Контрагенты" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <ContractorsTable :data="data" class="m-5" />
        {{  }}
    </AppLayout>
</template>

<style scoped></style>
