<script setup>
defineProps({customers:Object})
import { router } from '@inertiajs/vue3';
function destroy(id){
    router.delete('/customers/'+id);
}
function edit(id){
    router.get('/customers/'+id+'/edit');
}
</script>

<template>
    <br><br>
    
    <div class="card col-5 offset-3">
        <div class="alert alert-success" v-if="$page.props.flash.message">
    {{ $page.props.flash.message }}
    </div>
        <table class="table table-bordered table-hover table-sm">
            <thead>
                <tr >
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="customer in customers">
                    <td>{{ customer.name }}</td>
                    <td>
                        <a href='customers/create' class="btn btn-outline-info">Create</a>
                        <button class="btn btn-outline-primary" @click.prevent="edit(customer.id)">Edit</button>
                        <button class="btn btn-outline-danger" @click.prevent="destroy(customer.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>