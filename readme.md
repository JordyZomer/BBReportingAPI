# BBReportingAPI based on the Lumen PHP Framework

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Current Routes
> +------+-----------------------+----------------------+------------------------------------------+-----------------+------------+
| Verb | Path                  | NamedRoute           | Controller                               | Action          | Middleware |
+------+-----------------------+----------------------+------------------------------------------+-----------------+------------+
| GET  | /                     |                      | None                                     | Closure         |            |
| POST | /api/reporting/create | api.reporting.create | App\Http\Controllers\ReportingController | createNewReport | auth       |
+------+-----------------------+----------------------+------------------------------------------+-----------------+------------+
