@props(['checked','errors'])

<input {{ $checked ? 'checked' : '' }} {{$attributes->merge(['class'=>"shrink-0 mt-0.5 border-gray-200 rounded-full text-primary focus:ring-primary disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"])}}>