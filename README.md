# Resolvedesk
 
A multi-tenant, API-first SaaS helpdesk platform built with Laravel 13 and served via Nginx. Resolvedesk lets businesses onboard to a shared platform, configure their own support environment, and manage customer tickets through a clean REST API — think a self-hosted, backend-only Zendesk.
 
---
 
## What It Does
 
Businesses (tenants) register on the platform and get an isolated workspace at their own subdomain. Within that workspace, admins invite support agents and customers, define SLA policies, and manage the full lifecycle of support tickets — from creation through assignment, resolution, and closure.
 
Everything is exposed as a versioned JSON API. There is no frontend; the API is designed to be consumed by any client: a web SPA, a mobile app, an admin dashboard, or automated tooling.
 
---
 
## Core Features
 
**Multi-tenancy** — Every tenant's data is fully isolated at the application layer. A user from one organisation can never see or interact with another organisation's tickets, agents, or configuration.
 
**Role-based access** — Four roles exist across two scopes. At the platform level, a Super Admin manages tenants. Within each tenant, an Admin configures the workspace, Agents handle tickets, and Customers submit and track their own requests.
 
**Ticket lifecycle** — Tickets move through a defined status graph (`new → open → pending → on_hold → resolved → closed`) with enforced valid transitions. Every state change, reassignment, and edit is written to an immutable audit log.
 
**SLA engine** — Tenants define response and resolution time targets per priority level. The system automatically computes ticket deadlines, tracks first-response timestamps, pauses SLA clocks when tickets are put on hold, and runs a background job every five minutes to detect and flag breaches.
 
**Async notifications** — Emails are never sent inline. All notifications (ticket assignments, agent replies, SLA breaches, report completions) are dispatched as queued jobs through Redis, with automatic retries and failure logging.
 
**Reporting** — A cached dashboard endpoint gives real-time stats on open, overdue, and resolved tickets along with SLA compliance rates. Admins can request full CSV or PDF exports for any date range; these are generated asynchronously and delivered by email.
 
**Webhooks** — Tenants can register outbound webhook endpoints subscribed to specific events. Payloads are signed with HMAC-SHA256, delivery is retried on failure, and a delivery log is kept for debugging.
 
**File attachments** — Agents and customers can attach files to tickets. Files are stored on S3, never publicly accessible by URL, and served via short-lived signed download links.
 
---
 
## Tech Stack
 
| Layer | Technology |
|---|---|
| Framework | Laravel 13 |
| Language | PHP 8.3 |
| Web server | Nginx + PHP-FPM |
| Database | MySQL 8.0 |
| Cache & queues | Redis 7 |
| Object storage | AWS S3 (S3-compatible) |
| Auth | Laravel Sanctum (bearer tokens) |
| Queue monitoring | Laravel Horizon |
| Process supervisor | Supervisord |
| OS | Ubuntu 22.04 LTS |
 
---
 
## Project Goals
 
This project is designed as a complete, production-grade learning exercise covering the full surface area of Laravel 13 — routing, middleware, Eloquent ORM, service container, events, queued jobs, caching, Sanctum auth, file storage, form requests, policies, testing, and task scheduling — combined with hands-on Nginx configuration including SSL termination, PHP-FPM integration, rate limiting, security headers, and static asset handling.
 
The accompanying SRS document defines every feature and expected behaviour in detail.
 
---
 
## Status
 
Active development — v1.0 in progress.