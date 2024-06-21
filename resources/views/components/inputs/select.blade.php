@props(['disabled' => false,'errors'])

<select {{ $disabled ? 'disabled' : '' }} {{$attributes->merge(['class'=>"block shadow-sm w-full border-gray-300 rounded-md 
                                                                          focus:border-primary focus:ring-primary 
                                                                          disabled:opacity-50 disabled:pointer-events-none
                                                                          dark:bg-gray-900 dark:border-gray-700 
                                                                          dark:text-gray-400 dark:focus:ring-dark_primary"])}}>{{$slot}}</select>