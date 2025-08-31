<?php

if (! function_exists('notify')) {
    /**
     * دالة إشعارات موحدة وبسيطة
     *
     * @param string $message رسالة الإشعار
     * @param string $type نوع الإشعار (success, error, warning, info)
     */
    function notify(string $message, string $type = 'success'): void
    {
        // استخدام الجلسة فقط - الطريقة الأكثر أماناً
        session()->flash('notify', [
            'message' => $message,
            'type' => $type,
            'id' => uniqid('notify_'),
            'timestamp' => now()->toISOString()
        ]);
    }
}

// دوال مساعدة
if (! function_exists('notifySuccess')) {
    function notifySuccess(string $message): void
    {
        notify($message, 'success');
    }
}

if (! function_exists('notifyError')) {
    function notifyError(string $message): void
    {
        notify($message, 'error');
    }
}

if (! function_exists('notifyWarning')) {
    function notifyWarning(string $message): void
    {
        notify($message, 'warning');
    }
}

if (! function_exists('notifyInfo')) {
    function notifyInfo(string $message): void
    {
        notify($message, 'info');
    }
}
