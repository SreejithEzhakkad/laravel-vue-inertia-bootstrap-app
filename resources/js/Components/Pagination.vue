<template>
    <nav aria-label="...">
        <ul class="pagination" v-if="links.length > 3">
            <li
                :class="{
                    'page-item': true,
                    disabled: link.url ? false : true,
                    active: link.active,
                }"
                v-for="(link, index) in links"
                :key="index"
            >
                <span
                    class="page-link"
                    v-if="!link.url"
                    v-html="link.label"
                ></span>
                <inertia-link
                    v-if="link.url"
                    :href="link.url"
                    class="page-link"
                    v-html="link.label"
                ></inertia-link>
            </li>
        </ul>
    </nav>
</template>
<script>
export default {
    props: {
        links: Array,
    },
};
</script>
