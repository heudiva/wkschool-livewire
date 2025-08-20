<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Appearance')" :subheading=" __('Update the appearance settings for your account')">
        <flux:radio.group x-data variant="segmented" class=" items-center gap-4" x-model="$flux.appearance">
            
            @php($languages = ['en' => 'English', 'kh' => 'Khmer'])
            <div>Language: {{  $languages[Session::get('locale', 'en')] }}</div>
    
            <a href="{{ route('lang.change', ['lang' => 'kh']) }}">Khmer</a>
            <a href="{{ route('lang.change', ['lang' => 'en']) }}">English</a>
        </flux:radio.group>
    </x-settings.layout>
</section>
