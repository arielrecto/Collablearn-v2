@php
    $colors = [
        'pending' => 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-300',
        'on progress' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
        'cancel' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
        'done' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
        'redo' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300',
        'default' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
        'rejected' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300'
    ];

    $badgeClass = $colors[$status] ?? $colors['default'];
@endphp

<span class="{{ $badgeClass }} text-xs font-medium me-2 px-2.5 py-0.5 rounded">
    {{ ucfirst($status) }}
</span>
