<template>
    <table class="table datatable">
        <thead class="thead-info bg-info text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col" class="text-center">Name</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(category, index) in categories" :key="index">
            <th scope="row">{{ index + 1}}</th>
            <td class="text-center">{{ category.name }}</td>
            <td class="text-center">
                <router-link href="#" class="btn btn-outline-info rounded-circle round"
                     :to="{
                    name: 'admin.categories.edit',
                    params: {
                        category: category.slug
                    }
                    }"
                >
                    <i class="fa fa-pencil"></i>
                </router-link>
                <a href="#" class="btn btn-outline-danger rounded-circle round" @click.prevent="deleteCategory(category)">
                    <i class="fa fa-trash-o"></i>
                </a>
            </td>
        </tr>

        </tbody>
    </table>
</template>

<script>
    export default {
        name: "Categories",
        props: ["categories"],
        data() {
            return {
                endpoint: "/api/categories"
            }
        },
        
        methods: {
            deleteCategory(category) {
                let message = "Are you sure you want to delete it ?";
                if(! this.confirm(message)) {
                    return;
                }

            },
            confirm(message) {
                return confirm(message);
            }
        },
    }
</script>

<style scoped>
    .round {
        width: 30px;
        height: 30px;
        position: relative;
    }
    .round i {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>