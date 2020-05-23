<template>
    <ul class="menu-nav">
        <li v-for="item in menu" :key="item.text" class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
            <router-link :to="item.link" class="menu-link menu-toggle">
                <span class="menu-text">{{item.text}}</span>
                <i class="menu-arrow"></i>
            </router-link>
        </li>
    </ul>
</template>

<script>
export default {
    name: 'Menu',
    data() {
        return {
            menu: [
                {'link': '/adopt', 'text': 'Dogs'},
                {'link': '/donate', 'text': 'Donate'},
                {'link': '/sponsor', 'text': 'Sponsor'},
                {'link': '/merchandise', 'text': 'Merchandise'},
            ]
        }
    }
}
</script>