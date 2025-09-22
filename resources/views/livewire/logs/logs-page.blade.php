<div>

    <flux:main container>
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-2">
                <div class="flex items-center gap-2">
                    <flux:select size="sm" class="">
                        <option>Last 7 days</option>
                        <option>Last 14 days</option>
                        <option selected>Last 30 days</option>
                        <option>Last 60 days</option>
                        <option>Last 90 days</option>
                    </flux:select>

                    <flux:subheading class="max-md:hidden whitespace-nowrap">compared to</flux:subheading>

                    <flux:select size="sm" class="max-md:hidden">
                        <option selected>Previous period</option>
                        <option>Same period last year</option>
                        <option>Last month</option>
                        <option>Last quarter</option>
                        <option>Last 6 months</option>
                        <option>Last 12 months</option>
                    </flux:select>
                </div>

                <flux:separator vertical class="max-lg:hidden mx-2 my-2" />

                <div class="max-lg:hidden flex justify-start items-center gap-2">
                    <flux:subheading class="whitespace-nowrap">Filter by:</flux:subheading>

                    <flux:badge as="button" variant="pill" color="zinc" icon="plus" size="lg">Amount
                    </flux:badge>
                    <flux:badge as="button" variant="pill" color="zinc" icon="plus" size="lg"
                        class="max-md:hidden">Status</flux:badge>
                    <flux:badge as="button" variant="pill" color="zinc" icon="plus" size="lg">More
                        filters...</flux:badge>
                </div>
            </div>


        </div>

        <div class="flex gap-6 mb-6">

            <div class="relative flex-1 rounded-lg px-6 py-4 bg-zinc-50 dark:bg-zinc-700 ">
                <flux:subheading> slat title </flux:subheading>

                <flux:heading size="xl" class="mb-2">slat value </flux:heading>


            </div>

            <div class="absolute top-0 right-0 pr-2 pt-2">
                <flux:button icon="ellipsis-horizontal" variant="subtle" size="sm" />
            </div>
            <div class="relative flex-1 rounded-lg px-6 py-4 bg-zinc-50 dark:bg-zinc-700 ">
                <flux:subheading> slat title </flux:subheading>

                <flux:heading size="xl" class="mb-2">slat value </flux:heading>


            </div>

            <div class="absolute top-0 right-0 pr-2 pt-2">
                <flux:button icon="ellipsis-horizontal" variant="subtle" size="sm" />
            </div>

            <div class="relative flex-1 rounded-lg px-6 py-4 bg-zinc-50 dark:bg-zinc-700 ">
                <flux:subheading> slat title </flux:subheading>

                <flux:heading size="xl" class="mb-2">slat value </flux:heading>


            </div>

            <div class="absolute top-0 right-0 pr-2 pt-2">
                <flux:button icon="ellipsis-horizontal" variant="subtle" size="sm" />
            </div>
        </div>

</div>


</flux:main>
</div>
