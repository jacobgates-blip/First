# Gear Out — a Merit-level example

This is a small, complete example of what a **Merit**-level Gear Out submission
could look like — deliberately calibrated to sit above Achieved and short of
Excellence, so it's useful as a reference point for both.

## What's here

```
index.php        Home page, with purpose/users documented in a comment
borrow.php        Loan form — shows errors and re-fills itself after a failed submit
save_loan.php     Insert handler — validation, prepared statement
view_loans.php    Current loans — overdue highlighting
return_loan.php   Update handler
config.php        PDO connection
schema.sql        Table + sample rows (one deliberately overdue, for testing)
style.css         Plain, functional styling
```

Drop the `.php` files and `style.css` into your Codespaces web root, run
`schema.sql` against a `gearout` database, and it runs as-is.

## Why this is Merit, not just Achieved

**Achieved** just needs a working outcome that meets its requirements and has
been tested for basic functionality. This example does that — but Merit asks
for two things on top of that:

### 1. Follows conventions relevant to the domain

- Every query touching user input uses a **prepared statement** — including
  `return_loan.php`'s `UPDATE`, which is easy to skip since the `id` "looks safe."
- `PDO::ATTR_EMULATE_PREPARES => false` in `config.php` — an explicit choice to
  use real prepared statements rather than PHP's emulated ones, not just the default.
- Every value echoed to the page goes through `htmlspecialchars()`.
- **Post/Redirect/Get**: `save_loan.php` and `return_loan.php` never render a
  page directly — they redirect. Refreshing `view_loans.php` after logging a
  loan can't accidentally resubmit it.
- Shared `partials/header.php` / `footer.php` instead of repeating the same
  HTML in five files.
- Consistent naming (`snake_case` for columns and form fields, `camelCase`-free
  but consistent PHP variable style throughout).

### 2. Uses information from testing to make improvements

This is the part that's easy to miss — Merit isn't "cleaner code," it's
**code that changed because testing found something**. Keep a record like this
as you go; it's the actual evidence:

| Test | Expected | Actual | Fix made |
|---|---|---|---|
| Submit the form with the browser's JS disabled | Rejected, same as normal | A blank row was inserted — the `required` attribute did nothing | Added server-side checks in `save_loan.php` for empty `item_name` / `borrower_name` |
| Enter a due-back date of yesterday | Rejected, or at least flagged | Loan saved fine, then showed as "overdue" immediately | Added a check that `due_back` isn't before today |
| Load `view_loans.php` with an overdue sample row (see `schema.sql`) | Overdue item stands out somehow | Looked identical to an on-time item | Added the `.overdue` row class and the "overdue" badge |
| Submit the form, then hit the browser's back button and resubmit | Nothing happens / no duplicate | A second identical loan was created | Switched to redirect-after-POST so the browser has nothing to resubmit |

Each row is: something broke or looked wrong → the fix is visible in the code
above. That traceability is what a marker is looking for, more than the fix itself.

## What's deliberately *not* here (this is where Excellence starts)

- No one outside the person who wrote it has used this. There's no trial
  record, and nothing here changed because of another person's feedback —
  that's the specific gap between Merit and Excellence for this outcome.
- No optimisation beyond "fit for purpose" — e.g. no search/filter, no
  handling for two monitors submitting at once, no session-based login.
  Excellence wants *optimal*, not just *correct*.
- The overdue highlight is a testing-driven fix, not a trial-driven
  enhancement. If a trial user said "I didn't notice the badge, I'd want it
  at the top of the page instead," acting on *that* would be Excellence
  evidence — acting on your own testing, as this does, is Merit evidence.

## Using this with students

This pairs with the Gear Out student booklet and teacher resource already
built for AS92005. Suggested uses:
- Show it *after* Lesson 4, once students have their own working Achieved-level
  version, so the comparison is concrete rather than abstract.
- Don't hand out the file itself before Lesson 5 — the point is for students to
  find their own testing-driven fixes first, then compare notes.
- The testing log format above is worth reusing directly as a template for
  their own Lesson 4–5 testing log.
