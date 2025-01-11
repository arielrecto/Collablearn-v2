<x-dashboard.student.base>
    <div class="w-full mx-auto p-4 border rounded-md shadow bg-white">
        <!-- Header -->
        <div class="flex items-center gap-3 mb-4">

            @php
                $postedBy = $learningModule->postedBy;
                $profile = $postedBy->profile;
            @endphp

            @if (!$learningModule->postedBy->profile)
                <img src="https://ui-avatars.com/api/?name={{ $postedBy->name }}" alt="Avatar"
                    class="w-6 h-6 rounded-full">
                <div>
                    <p class="font-medium text-gray-800">{{ $postedBy->name }}</p>
                </div>
            @elseif ($learningModule->postedBy->profile->photo)
                <img src="{{ $learningModule->postedBy->profile->photo }}" alt="Avatar" class="w-6 h-6 rounded-full">
            @else
                <img src="https://ui-avatars.com/api/?name={{ $learningModule->postedBy->profile->first_name }} {{ $learningModule->posted_by->profile->last_name }}"
                    alt="Avatar" class="w-6 h-6 rounded-full">
            @endif

            <p class="text-sm text-gray-500">{{ $learningModule->created_at->format('F d, Y') }}</p>
        </div>

        <!-- Message Content -->
        <div class="mb-4">
            <p class="text-gray-800 text-lg font-medium">
                {{ $learningModule->title }}
            </p>
            <p class="text-gray-500 text-sm mt-2">
                {{ $learningModule->description }}</p>
        </div>

        <!-- Attachment Section -->
        <div class="mt-4 border-t pt-4">
            <p class="text-sm font-medium text-gray-700">One attachment</p>



            @foreach ($learningModule->attachments as $attachment)
                <div class="flex items-center gap-3 mt-2">
                    <!-- PDF Icon -->
                    <img src="/pdf.png" alt="PDF Icon" class="w-12 h-12">
                    <div>
                        <p class="text-sm font-medium text-primary">{{ $attachment->name }}</p>
                        <p class="text-xs text-gray-500">{{ $attachment->formattedSize() }}</p>
                    </div>
                    <!-- Download Button -->
                    <a href="{{ $attachment->file }}" class="ml-auto btn btn-sm btn-primary flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Download
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</x-dashboard.student.base>
