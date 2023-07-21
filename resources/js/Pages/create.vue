<script setup>
import { useForm  } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

defineProps({
    errors:Object
});

const form=useForm({
  name:null,
  email:null,
  phone:null
});
function submit (){
  router.post('/customers/',form)
}
</script>

<template>
    <div class="card col-6 offset-3">
        <div class="card-header">Featured</div>
        <div class="card-body">
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label for="name" class="form-label"
                        >Name </label
                    >
                    <input
                        type="name"
                        v-model="form.name"
                        id="name"
                        class="form-control"
                       
                    />
                    <small class="text-danger text-sm" v-if="errors.name">{{ errors.name }}</small>
                   
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label"
                        >Email</label
                    >
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        v-model="form.email"
                        
                    />
                    <small class="text-danger text-sm" v-if="errors.email">{{ errors.email }}</small>
                </div>
                
                <div class="mb-3">
                    <label for="phone" class="form-label"
                        >Phone</label
                    >
                    <input
                        type="number"
                        class="form-control"
                        id="phone"
                        v-model="form.phone"
                    />
                    <small class="text-danger text-sm" v-if="errors.phone">{{ errors.phone }}</small>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</template>
