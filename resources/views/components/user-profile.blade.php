@props(['active'])

@php

@endphp

<div class="space-y-6 lg:col-start-1 lg:col-span-2" x-data="{ showEditForm: true }">
    <section aria-labelledby="applicant-information-title"  x-show="!showEditForm">
        <x-profile-details></x-profile-details>
    </section>
    <section aria-labelledby="applicant-information-title" style="margin-top: 0;" x-show="showEditForm">
        <x-forms.edit-profile></x-forms.edit-profile>
    </section>
</div>
