<?php
namespace App\Listeners\Backend;

/**
 * Class Test102EventListener.
 */
/**
 * Class Test102Created.
 */
class Test102EventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Test102 Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Test102  Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Test102 Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Test102\Test102Created::class,
            'App\Listeners\Backend\Test102EventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Test102\Test102Updated::class,
            'App\Listeners\Backend\Test102EventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Test102\Test102Deleted::class,
            'App\Listeners\Backend\Test102EventListener@onDeleted'
        );
    }
}
