@props(['disabled' => false,'errors'])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 rounded-md shadow-sm
                                                                             focus:border-primary focus:ring-primary
                                                                             dark:bg-gray-900 dark:text-gray-300 
                                                                             dark:border-gray-700 dark:focus:border-dark_primary 
                                                                             dark:focus:ring-dark_primary']) !!}>