@props(['disabled' => false,'errors'])

<input {{$attributes->merge(['class'=>"rounded text-primary shadow-sm focus:ring-primary
                                       border-gray-300 dark:bg-gray-900 dark:border-gray-700 
                                       dark:focus:ring-dark_primary dark:focus:ring-offset-gray-800
                                       dark:text-dark_primary"])}}>