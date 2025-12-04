@section('headerTitle')
    {{ __('settings.settings') }}
@endsection

<x-app-layout>
    <div class="space-y-4 lg:space-y-6">
        <div class="space-y-0.5">
            <h2 class="text-2xl font-bold tracking-tight">Settings</h2>
            <p class="text-muted-foreground">Manage your account settings and set e-mail preferences.</p>
        </div>
        <div class="flex flex-col space-y-4 lg:flex-row lg:space-y-0 lg:space-x-4">
            <aside class="lg:w-64">
                <div class="fixed top-0 left-0 flex flex-col gap-6 rounded-xl border py-0">
                    <div class="p-2">
                        <nav class="flex flex-col space-y-0.5 space-x-2 lg:space-x-0">
                            <a data-slot="button"
                                class="inline-flex hover:bg-gray-50 bg-gray-50 items-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:text-accent-foreground dark:hover:bg-accent/50 h-9 px-4 py-2 has-[&gt;svg]:px-3 justify-start bg-muted hover:bg-muted"
                                href="/dashboard/pages/settings">
                                <x-lucide-user class="w-4 h-4 text-gray-600"/>
                                Profile
                            </a>
                                <a data-slot="button"
                                class="inline-flex hover:bg-gray-50 items-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:text-accent-foreground dark:hover:bg-accent/50 h-9 px-4 py-2 has-[&gt;svg]:px-3 hover:bg-muted justify-start"
                                href="/dashboard/pages/settings/account">
                                <x-lucide-shield class="w-4 h-4 text-gray-600"/>
                                Security
                            </a>
                            <a data-slot="button"
                                class="inline-flex hover:bg-gray-50 items-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:text-accent-foreground dark:hover:bg-accent/50 h-9 px-4 py-2 has-[&gt;svg]:px-3 hover:bg-muted justify-start"
                                href="/dashboard/pages/settings/billing">
                                <x-lucide-credit-card class="w-4 h-4 text-gray-600"/>
                                Billing & Subscription
                            </a>
                            <a data-slot="button"
                                class="inline-flex hover:bg-gray-50 items-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:text-accent-foreground dark:hover:bg-accent/50 h-9 px-4 py-2 has-[&gt;svg]:px-3 hover:bg-muted justify-start"
                                href="/dashboard/pages/settings/billing">
                                <x-lucide-users class="w-4 h-4 text-gray-600"/>
                                Team & Roles
                            </a>
                                <a data-slot="button"
                                class="inline-flex hover:bg-gray-50 items-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:text-accent-foreground dark:hover:bg-accent/50 h-9 px-4 py-2 has-[&gt;svg]:px-3 hover:bg-muted justify-start"
                                href="/dashboard/pages/settings/appearance">
                                <x-lucide-palette class="w-4 h-4 text-gray-600"/>
                                Appearance
                            </a>
                                <a data-slot="button"
                                class="inline-flex hover:bg-gray-50 items-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:text-accent-foreground dark:hover:bg-accent/50 h-9 px-4 py-2 has-[&gt;svg]:px-3 hover:bg-muted justify-start"
                                href="/dashboard/pages/settings/notifications">
                                <x-lucide-bell class="w-4 h-4 text-gray-600"/>
                                Notifications
                            </a>
                                <a data-slot="button"
                                class="inline-flex hover:bg-gray-50 items-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:text-accent-foreground dark:hover:bg-accent/50 h-9 px-4 py-2 has-[&gt;svg]:px-3 hover:bg-muted justify-start"
                                href="/dashboard/pages/settings/display">
                                <x-lucide-contrast class="w-4 h-4 text-gray-600"/>
                                Display
                            </a>
                        </nav>
                    </div>
                </div>
            </aside>
            <div class="flex-1 lg:max-w-2xl">
                <div class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6">
                    <div class="px-6">
                        <form class="space-y-8">
                            <div class="flex flex-col gap-2">
                                <div class="inline-flex items-center gap-2 align-top"><span data-slot="avatar"
                                        class="relative flex size-8 shrink-0 overflow-hidden rounded-full h-20 w-20"><span
                                            data-slot="avatar-fallback"
                                            class="bg-muted flex size-full items-center justify-center rounded-full"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-circle-user-round opacity-45" aria-hidden="true">
                                                <path d="M18 20a6 6 0 0 0-12 0"></path>
                                                <circle cx="12" cy="10" r="4"></circle>
                                                <circle cx="12" cy="12" r="10"></circle>
                                            </svg></span></span>
                                    <div class="relative flex gap-2"><button data-slot="button"
                                            class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive bg-primary text-primary-foreground shadow-xs hover:bg-primary/90 h-9 px-4 py-2 has-[&gt;svg]:px-3"
                                            type="button" aria-haspopup="dialog">Upload image</button><input
                                            accept="image/*" class="sr-only" aria-label="Upload image file"
                                            tabindex="-1" type="file"></div>
                                </div>
                            </div>
                            <div data-slot="form-item" class="grid gap-2"><label data-slot="form-label"
                                    class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50 data-[error=true]:text-destructive"
                                    data-error="false" for="_r_32_-form-item">Username</label><input
                                    data-slot="form-control"
                                    class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive"
                                    placeholder="shadcn" id="_r_32_-form-item"
                                    aria-describedby="_r_32_-form-item-description" aria-invalid="false"
                                    name="username">
                                <p data-slot="form-description" id="_r_32_-form-item-description"
                                    class="text-muted-foreground text-sm">This is your public display name. It can
                                    be your real name or a pseudonym. You can only change this once every 30 days.
                                </p>
                            </div>
                            <div data-slot="form-item" class="grid gap-2"><label data-slot="form-label"
                                    class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50 data-[error=true]:text-destructive"
                                    data-error="false" for="_r_33_-form-item">Email</label><button type="button"
                                    role="combobox" aria-controls="radix-_r_34_" aria-expanded="false"
                                    aria-autocomplete="none" dir="ltr" data-state="closed" data-placeholder=""
                                    data-slot="form-control" data-size="default"
                                    class="border-input data-[placeholder]:text-muted-foreground [&amp;_svg:not([class*='text-'])]:text-muted-foreground focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-input/30 dark:hover:bg-input/50 flex items-center justify-between gap-2 rounded-md border bg-transparent px-3 py-2 text-sm whitespace-nowrap shadow-xs transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 data-[size=default]:h-9 data-[size=sm]:h-8 *:data-[slot=select-value]:line-clamp-1 *:data-[slot=select-value]:flex *:data-[slot=select-value]:items-center *:data-[slot=select-value]:gap-2 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4 w-full"
                                    id="_r_33_-form-item" aria-describedby="_r_33_-form-item-description"
                                    aria-invalid="false"><span data-slot="select-value"
                                        style="pointer-events: none;">Select a verified email to display</span><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-chevron-down size-4 opacity-50" aria-hidden="true">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg></button><select aria-hidden="true" tabindex="-1"
                                    style="position: absolute; border: 0px; width: 1px; height: 1px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; overflow-wrap: normal;">
                                    <option value=""></option>
                                    <option value="m@example.com">m@example.com</option>
                                    <option value="m@google.com">m@google.com</option>
                                    <option value="m@support.com">m@support.com</option>
                                </select>
                                <p data-slot="form-description" id="_r_33_-form-item-description"
                                    class="text-muted-foreground text-sm">You can manage verified email addresses
                                    in your <a href="#">email settings</a>.</p>
                            </div>
                            <div data-slot="form-item" class="grid gap-2"><label data-slot="form-label"
                                    class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50 data-[error=true]:text-destructive"
                                    data-error="false" for="_r_35_-form-item">Bio</label>
                                <textarea data-slot="form-control"
                                    class="border-input placeholder:text-muted-foreground focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-input/30 flex field-sizing-content min-h-16 w-full rounded-md border bg-transparent px-3 py-2 text-base shadow-xs transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm resize-none"
                                    placeholder="Tell us a little bit about yourself" name="bio" id="_r_35_-form-item"
                                    aria-describedby="_r_35_-form-item-description" aria-invalid="false">I own a computer.</textarea>
                                <p data-slot="form-description" id="_r_35_-form-item-description"
                                    class="text-muted-foreground text-sm">You can <span>@mention</span> other users
                                    and organizations to link to them.</p>
                            </div>
                            <div class="space-y-2">
                                <div data-slot="form-item" class="grid gap-2"><label data-slot="form-label"
                                        class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50 data-[error=true]:text-destructive"
                                        data-error="false" for="_r_36_-form-item">URLs</label>
                                    <p data-slot="form-description" id="_r_36_-form-item-description"
                                        class="text-muted-foreground text-sm">Add links to your website, blog, or
                                        social media profiles.</p><input data-slot="form-control"
                                        class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive"
                                        id="_r_36_-form-item" aria-describedby="_r_36_-form-item-description"
                                        aria-invalid="false" value="https://shadcn.com" name="urls.0.value">
                                </div>
                                <div data-slot="form-item" class="grid gap-2"><label data-slot="form-label"
                                        class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50 data-[error=true]:text-destructive sr-only"
                                        data-error="false" for="_r_37_-form-item">URLs</label>
                                    <p data-slot="form-description" id="_r_37_-form-item-description"
                                        class="text-muted-foreground text-sm sr-only">Add links to your website,
                                        blog, or social media profiles.</p><input data-slot="form-control"
                                        class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive"
                                        id="_r_37_-form-item" aria-describedby="_r_37_-form-item-description"
                                        aria-invalid="false" value="http://twitter.com/shadcn" name="urls.1.value">
                                </div><button data-slot="button"
                                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-background shadow-xs hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5"
                                    type="button">Add URL</button>
                            </div><button data-slot="button"
                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive bg-primary text-primary-foreground shadow-xs hover:bg-primary/90 h-9 px-4 py-2 has-[&gt;svg]:px-3"
                                type="submit">Update profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
