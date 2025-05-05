import { h } from 'vue';
import type { ColumnDef } from '@tanstack/vue-table';
import DropdownAction from './data-table-dropdown.vue';
import { ArrowUpDown, ChevronDown, ChevronUp } from 'lucide-vue-next';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';

export interface Payment {
    id: string,
    name: string,
    inn: string
}
export const columns: ColumnDef<Payment>[] = [
    {
        accessorKey: 'id',
        header: 'Id',
        cell: ({ row }) => h('div', { class: 'lowercase' }, row.getValue('id')),
    },
    {
        accessorKey: 'name',
        header: ({ column }) => {
            let badge = ArrowUpDown;

            if (column.getIsSorted() === 'asc') {
                badge = ChevronDown;
            } else if (column.getIsSorted() === 'desc') {
                badge = ChevronUp;
            }

            return h(Button, {
                variant: 'ghost',
                onClick: () => column.toggleSorting(column.getIsSorted() === 'asc'),
            }, () => [
                'Email',
                h(badge, { class: 'ml-2 h-4 w-4' })
            ])
        },
        cell: ({ row }) => h('div', { class: 'lowercase' }, row.getValue('name')),
    }
];
