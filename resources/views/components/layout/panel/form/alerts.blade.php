<ul v-if="Object.keys(form.errors).length > 0"
    class="col-span-full list-disc list-inside bg-yellow-100 border border-yellow-200 text-sm text-yellow-800 rounded-lg p-4 dark:bg-yellow-800/10 dark:border-yellow-900 dark:text-yellow-500">
    <li v-for="(error, key) in form.errors" class="space-x-1 rtl:space-x-reverse">
        <span v-text="error"></span>
    </li>
</ul>
