<div>
    <form wire:submit.prevent="save" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name -->
            <div class="relative z-0 w-full mb-3 group">
                <input 
                    type="text" 
                    wire:model.live="name" 
                    id="name" 
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 
                        border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                        dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
                    placeholder=" " 
                    required
                />
                <label for="name" 
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                        transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                        peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto 
                        peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 peer-focus:-translate-y-6">
                    Full Name
                </label>
                @error('name') 
                    <span class="text-sm text-red-500">{{ $message }}</span> 
                @enderror
            </div>
            <!-- Phone -->
            <div class="relative z-0 w-full mb-3 group">
                <input 
                    type="tel" 
                    wire:model.live="phone" 
                    id="phone" 
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 
                        border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                        dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
                    placeholder=" " 
                    required
                />
                <label for="phone" 
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                        transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                        peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto 
                        peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 peer-focus:-translate-y-6">
                    Phone Number
                </label>
                @error('phone') 
                    <span class="text-sm text-red-500">{{ $message }}</span> 
                @enderror
            </div>
        </div>
        <!-- Address -->
        <div class="relative z-0 w-full group mb-6">
            <textarea 
                wire:model.live="address" 
                id="address" 
                rows="3"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 
                    border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                    dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer resize-none" 
                placeholder=" " 
                required
            ></textarea>
            <label for="address" 
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                    transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                    peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto 
                    peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                    peer-focus:scale-75 peer-focus:-translate-y-6">
                Address
            </label>
            @error('address') 
                <span class="text-sm text-red-500">{{ $message }}</span> 
            @enderror
        </div>
        <!-- Place of Birth -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="relative z-0 w-full mb-3 group">
                <input 
                    type="text"
                    wire:model.live="pob" 
                    id="pob" 
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 
                        border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                        dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
                    placeholder=" " 
                    required
                />
                <label for="pob" 
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                        transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                        peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto 
                        peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 peer-focus:-translate-y-6">
                    Place of Birth
                </label>
                @error('name') 
                    <span class="text-sm text-red-500">{{ $message }}</span> 
                @enderror
            </div>
            <!-- Date of Birth -->
            <div class="relative z-0 w-full mb-3 group">
                <input 
                    type="date"
                    wire:model.live="dob" 
                    id="dob" 
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 
                        border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                        dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
                    placeholder=" " 
                    required
                />
                <label for="dob" 
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                        transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                        peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto 
                        peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 peer-focus:-translate-y-6">
                    Date of Birth
                </label>
                @error('name') 
                    <span class="text-sm text-red-500">{{ $message }}</span> 
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Gender -->
            <div class="relative z-0 w-full mb-3 group">
                <select 
                    id="gender" 
                    wire:model="gender"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 
                        border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                        dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
                    required
                >
                    <option value="" disabled selected>--Select Gender--</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <label for="gender" 
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                        transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                        peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto 
                        peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 peer-focus:-translate-y-6">
                    Gender
                </label>
                @error('gender') 
                    <span class="text-sm text-red-500">{{ $message }}</span> 
                @enderror
            </div>
            <!-- Marrietal Status -->
            <div class="relative z-0 w-full mb-3 group">
                <select 
                    id="married" 
                    wire:model="married"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 
                        border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                        dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
                    required
                >
                    <option value="" disabled selected>--Select--</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>
                <label for="gender" 
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                        transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                        peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto 
                        peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 peer-focus:-translate-y-6">
                    Marrietal Status
                </label>
                @error('married') 
                    <span class="text-sm text-red-500">{{ $message }}</span> 
                @enderror
            </div>
        </div>

        <hr class="my-6 border-t border-gray-200 dark:border-gray-700" />

        <!-- Submit -->
        <div class="flex justify-end">
            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none">
                Save Employee
            </button>
        </div>
    </form>
</div>
